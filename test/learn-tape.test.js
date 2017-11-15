var test = require('tape'); // assign the tape library to the variable "test"

function add(a, b){
    return a + b;
}

function sub(a, b){
    return a - b;
}

function mul(a, b){
    return a * b;
}

function div(a, b){
    if(b == 0) return false;
    return a / b;
}

function avg(a){
    let b = 0;
    a.forEach(a => b += a);
    return b/(a.length);
}

let accounts = [];

function Account(fname, lname, initialAmount){
    this.fname = fname;
    this.lname = lname;
    this.amount = initialAmount;
    this.credit = function(amount){
        this.amount += amount;
    }
    this.debit = function(amount){
        if(this.amount - amount <= 0) return false;
        this.amount -= amount;
    }
}

function createAccount(fname, lname, initialAmount){
    let account = new Account(fname, lname, initialAmount);
    accounts.push(account);
}

test('should return -1 when the value is not present in Array', function (t) {
  //t.equal(-1, [1,2,3].indexOf(4)); // 4 is not present in this array so passes
  t.equal(4, add(2,2));
  t.equal(0, sub(2,2));
  t.equal(4, mul(2,2));
  t.equal(false, div(1,0));
  t.equal(1, div(2,2));
  t.equal(1, avg([1,1,1,1], 'La fonction moyenne fail'));
  t.end();
});
