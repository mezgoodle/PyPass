// DOM elements
const resultEl = document.getElementById('result');
const lengthEl = document.getElementById('length');
const uppercaseEl = document.getElementById('uppercase');
const lowercaseEl = document.getElementById('lowercase');
const numbersEl = document.getElementById('numbers');
const symbolsEl = document.getElementById('symbols');
const generateEl = document.getElementById('generate');
const clipboard = document.getElementById('clipboard');

const randomFunc = {
	'lower': getRandomLower,
	'upper': getRandomUpper,
	'number': getRandomNumber,
	'symbol': getRandomSymbol
}

// Generator functions

const getRandomLower = () => String.fromCharCode(Math.floor(Math.random() * 26) + 97);

const getRandomUpper = () => String.fromCharCode(Math.floor(Math.random() * 26) + 65);

const getRandomNumber = () => (+String.fromCharCode(Math.floor(Math.random() * 10) + 48));

const getRandomSymbol = () => {
	const symbols = '!@#$%^&*(){}[]=<>/,.';
}
