const errorText = document.getElementById('error-message');
errorText.style.display = 'none';
const phoneDetails = document.getElementById('phone-details');


const phoneSearch = () => {
    const searchFieldValue = document.getElementById('search-field');
    const phoneSearchText = searchFieldValue.value;
    searchFieldValue.value = '';
    // error handling
    if (phoneSearchText == '') {
        errorText.style.display = 'block';
        errorText.innerHTML = "Error search box is empty, Please search something"
    } 
    // serach result handle
    else {
        const url = `https://openapi.programming-hero.com/api/phones?search=${phoneSearchText}`;
        fetch(url)
            .then(response => response.json())
            .then(responseData => displaySearchResult(responseData.data))
    }
}

const displaySearchResult = phones => {
    const searchResult = document.getElementById('search-result');
    searchResult.textContent = '';
    phoneDetails.innerHTML = "";
    if (phones.length == 0) {
        errorText.innerHTML = "According to your search no phone was found"
        errorText.style.display = 'block';
    }
    (phones.slice(0, 20)).forEach(phone => {
        const div = document.createElement('div');
        div.classList.add('col-lg-4');
        // phone search Result as html
        div.innerHTML = `
            <div class="border bg-light p-2 rounded"  >
            <img class=" mx-auto d-block m-2" src="${phone.image}"/>
                <h5> ${phone.phone_name}</h5>
                <p> Brand : ${phone.brand}</p>
                <div class="d-grid">
                    <button onclick="loadPhoneDetail('${phone.slug}')" class="btn btn-info">Details</button>
                </div>
            </div>
        `
        searchResult.appendChild(div);
        errorText.style.display = 'none';
    })
}

const loadPhoneDetail = (slug) => {

    const url = `https://openapi.programming-hero.com/api/phone/${slug}`;
    fetch(url)
        .then(res => res.json())
        .then(data => displayPhoneDetail(data.data));
}

const displayPhoneDetail = (details) => {
    console.log(details.mainFeatures);
    const div = document.createElement('div');
    div.classList.add('card');
    let mainFeatures = details.mainFeatures ? details.mainFeatures : '';
    let sensor = details.mainFeatures.sensors ? details.mainFeatures.sensors : '';
    let other = details.others ? details.others : "";
    phoneDetails.innerHTML = "";
    window.scrollTo(0, 50);
    // single phone details as html
    div.innerHTML = `
    <div class="card-body bg-light rounded ">
    <img src="${details.image}" class="card-img-top mx-auto d-block w-50 my-2" alt="...">
        <h5 class="card-title"> Device Name : ${details.name}</h5>
        <p class="card-text"> <strong>Brand</strong> : ${details.brand}</p>
        <p class="card-text"> <strong>Release Date</strong> : ${details.releaseDate ? details.releaseDate : "No release Date found" }</p>
        <h5><strong>Main Features</strong></h5>
        <ul class="list-group list-unstyled">
            <li>ChipSet : ${mainFeatures.chipSet ? mainFeatures.chipSet : " "}</li>
            <li>Display-Size : ${mainFeatures.displaySize ? mainFeatures.displaySize : " "}</li>
            <li>Memory : ${mainFeatures.memory ? mainFeatures.memory : " "}</li>
            <li>Storage : ${mainFeatures.storage ? mainFeatures.storage : " "}</li>
        </ul>
        <br>
        <h5><strong>Sensors</strong></h5>
        <ul class="list-group list-unstyled">
            <li> ${sensor[0] ? sensor[0] : " "}</li>
            <li> ${sensor[1] ? sensor[1] : " "}</li>
            <li> ${sensor[2] ? sensor[2] : " "}</li>
            <li> ${sensor[3] ? sensor[3] : " "}</li>
            <li> ${sensor[4] ? sensor[4] : " "}</li>
            <li> ${sensor[5] ? sensor[5] : " "}</li>
        </ul>
        <br>
        <h5><strong>Others</strong></h5>
        <ul class="list-group list-unstyled">
            <li>Bluetooth : ${other.Bluetooth ? other.Bluetooth : "No Data Found"}</li>
            <li>GPS : ${other.GPS ? other.GPS : "No Data Found"}</li>
            <li>NFC : ${other.NFC ? other.NFC : "No Data Found"} </li>
            <li>Radio : ${other.Radio ? other.Radio : "No Data Found" }</li>
            <li>USB : ${other.USB ? other.USB : "No Data Found"} </li>
            <li>WLAN : ${other.WLAN ? other.WLAN : "No Data Found"} </li>
        </ul>
    </div>
    `;
    phoneDetails.appendChild(div);
}