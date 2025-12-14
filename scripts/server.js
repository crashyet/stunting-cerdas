import express from "express";
import multer from "multer";
import { GoogleGenerativeAI } from "@google/generative-ai";
import fs from "fs";
import 'dotenv/config';

const app = express();
const upload = multer({ dest: "uploads/" });

// CORS middleware - Allow requests from Laravel
app.use((req, res, next) => {
    res.header('Access-Control-Allow-Origin', '*');
    res.header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    res.header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    
    // Handle preflight requests
    if (req.method === 'OPTIONS') {
        return res.sendStatus(200);
    }
    
    next();
});

const genAI = new GoogleGenerativeAI(process.env.GEMINI_API_KEY);
const model = genAI.getGenerativeModel({ model: "gemini-2.5-flash" });
console.log("API KEY = ", process.env.GEMINI_API_KEY ? "LOADED" : "NOT FOUND");

// Fungsi ekstrak JSON
function extractJSON(text) {
    const jsonBlock = text.match(/```json([\s\S]*?)```/);
    if (jsonBlock) return jsonBlock[1].trim();

    const arrayMatch = text.match(/\[([\s\S]*?)\]/);
    if (arrayMatch) return "[" + arrayMatch[1].trim() + "]";

    return text;
}

app.post("/analyze", upload.single("image"), async (req, res) => {
    const imageFile = fs.readFileSync(req.file.path);
    const base64Image = imageFile.toString("base64");

    const prompt = `
You are a food detection expert. Analyze this meal photo and identify visible food items with estimated portion sizes.

Task: Identify all visible food items and estimate their weight in grams.

Output format: Return ONLY a valid JSON array with this exact structure:
[
  {
    "nama_menu": "Food name in Indonesian",
    "estimasi_gram": number,
    "kalori": number, 
    "protein": number, 
    "karbohidrat": number, 
    "lemak": number, 
    "deskripsi": "Brief description of the food item",
    "proses_pengolahan": "Brief description of how the food appears to be prepared"
  }
]

Important:
- Be accurate with portion size estimates
- Use Indonesian names for food items
- Include all visible food items
- Return only the JSON array, no other text
`;

    try {
        const result = await model.generateContent([
            prompt,
            {
                inlineData: {
                    mimeType: req.file.mimetype,
                    data: base64Image
                }
            }
        ]);

        const text = result.response.text();
        const cleaned = extractJSON(text);

        try {
            const json = JSON.parse(cleaned);
            res.json(json);

        } catch (err) {
            res.status(500).json({
                error: "Output bukan JSON valid",
                raw_output: text,
                cleaned_attempt: cleaned
            });
        }

    } catch (err) {
        res.status(500).json({ error: err.toString() });
    }
});

app.listen(3000, () => console.log("Server running on port 3000"));
