import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

// UTILITY

// NUMERO CASUALE DA 1 A 9
function getRndNumber(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

// LETTERA CASUALE DA A ad F
function getRndLetter() {
    const min = 65;
    const max = 70;
    const randomNum = Math.floor(Math.random() * (max - min + 1)) + min;
    return String.fromCharCode(randomNum);
}

// CLIENT FORM
const container = document.getElementById('container');

// INPUT DATA
const nameBox = document.querySelector('input[name="client-name"]');
const mileageBox = document.querySelector('input[name="mileage"]');
const ageBox = document.getElementById('age');
const dateBox = document.getElementById('date');
// GET BUTTON GENERATE
const buttonCalc = document.querySelector('.generate');
console.dir(buttonCalc);

// FUNCTION ON CLICK
buttonCalc.addEventListener('click', function () {
    const priceForKm = 0.21;
    const discount20 = 0.20;
    const discount40 = 0.40;
    const carriage = getRndNumber(1, 9);
    const seat = getRndNumber(1, 35).toString() + getRndLetter();

    let clientName = nameBox.value.trim();
    let mileage = parseInt(mileageBox.value);
    let age = ageBox.value;
    if (clientName === '' || isNaN(mileage)) {
        alert('Assicurati di aver inserito Nome e Cognome e/o la distanza da percorrere');
        return;
    }
    let date = dateBox.value;

    // // CALCULATOR
    let totalPrice = (mileage * priceForKm).toFixed(2);
    let discountApplied20 = (totalPrice * discount20).toFixed(2);
    let discountApplied40 = totalPrice * discount40.toFixed(2);
    let discountNot = 0;

    switch (age) {
        case 'minorenne': totalPrice -= discountApplied20;
        break;
        case 'over65': totalPrice -= discountApplied40;
        break;
    }

    // PRINT GENERATE

    // passenger details
    document.getElementById('print-nameclient').innerHTML = `
    <h2>${clientName}</h2>
    `
    document.getElementById('print-age').innerHTML = `
    <h2>${age}</h2>
    `
    if (ageBox.value == 'minorenne'){
        document.getElementById('discount').innerHTML = `
        <h2>Junior - sconto ${discountApplied20}&euro;</h2>
        `}
        else if (ageBox.value == 'over65'){
        document.getElementById('discount').innerHTML = `
        <h2>Senior - sconto ${discountApplied40}&euro;</h2>
        `}
        else if (ageBox.value != 'minorenne' && ageBox.value != 'over65'){
        document.getElementById('discount').innerHTML = `
        <h2>Standard</h2>
        `}

    document.getElementById('print-mileage').innerHTML = `
    <h4>${mileage}</h4>
    `
    document.getElementById('print-carriage').innerHTML = `
    <h4>${carriage}</h4>
    `
    document.getElementById('print-seat').innerHTML = `
    <h4>${seat}</h4>
    `
    document.getElementById('total-price').innerHTML = `
    <h4>${totalPrice}&euro;</h4>
    `
    document.getElementById('print-date').innerHTML = `
    <h4>${date}</h4>
    `
    document.querySelector('.discount-banner').classList.add('d-none');
    document.querySelector('.card-output').classList.toggle('d-none');
    document.querySelector('.container-output').classList.toggle('d-none');
}
 )


// GET BUTTON CANC
const buttonCanc = document.querySelector('.cancel');
console.dir(buttonCanc);

// FUNCTION ON CLICK
buttonCanc.addEventListener('click', function () {
    let clientName = "";
    let mileage = "";
    let age = "";
    let totalPrice ="";
    let discountApplied20 ="";
    let discountApplied40 ="";

    // PRINT DELETE
    document.getElementById('print-nameclient').innerHTML = `
    <h2>${clientName}</h2>
    `
    document.getElementById('print-mileage').innerHTML = `
    <h4>${mileage}</h4>
    `
    document.getElementById('print-age').innerHTML = `
    <h4>${age}</h4>
    `
    document.getElementById('total-price').innerHTML = `
    <h2>${totalPrice}</h2>
    `
    document.getElementById('discount').innerHTML = `
    <h4>${discountApplied20}</h4>
    `
    document.getElementById('discount').innerHTML = `
    <h4>${discountApplied40}</h4>
    `
    document.querySelector('.discount-banner').classList.remove('d-none');
    document.querySelector('.card-output').classList.toggle('d-none');
    document.querySelector('.container-output').classList.toggle('d-none');

}
 )

