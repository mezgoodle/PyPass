// Generator functions

const getRandomLower = () => String.fromCharCode(Math.floor(Math.random() * 26) + 97);

const getRandomUpper = () => String.fromCharCode(Math.floor(Math.random() * 26) + 65);

const getRandomNumber = () => String.fromCharCode(Math.floor(Math.random() * 10) + 48);

const getRandomSymbol = () => {
    const symbols = '!@#$%^&*(){}[]=<>/,.';
    return symbols[Math.floor(Math.random() * symbols.length)];
}
