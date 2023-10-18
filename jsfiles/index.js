
// -----------------------index page carousel--------------------------



let arr = ["image/img2.png", "image/img3.png", "image/img4.png"];

let i=0;

function slides2() {
document.getElementById("image").src = arr[i];

if (i < arr.length - 1)i++;
else i = 0;
}
setInterval(slides2, 1000);



// -----------------------index page carousel--------------------------


let content = document.querySelector('.js-generated.content')

let header = document.createElement('h1')
header.setAttribute('class', 'dog-name')
header.append('Rizzo')
content.append(header)

let dogContent = document.createElement('div')
dogContent.setAttribute('class', 'dog-content')
content.append(dogContent)

let dogImage = document.createElement('img')
dogImage.setAttribute('class', 'dog-image')
dogImage.setAttribute('src', './assets/rizzo.jpg')
content.append(dogImage)

let dogDetails = document.createElement('div')
dogDetails.setAttribute('class', 'dog-details')
content.append(dogDetails)


// --------------------------------login signup-------------------------------------------


