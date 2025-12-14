const myObject = { 
 first: 1, 
 second: 2, 
 third: 3, 
 pickFirst: function () { 
  console.log(this.first); 
 }, 
}; 

console.log(myObject.pickFirst);