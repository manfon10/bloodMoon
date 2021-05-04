//locals reviews data
const reviews = [
    {
        id: 1,
        name: 'Juan Carillo Noreña',
        job: 'Gamer Pro X',
        img: "image/jua.jpg",
        text: "Punctuality is one of the strongest virtues an employee can possess. They must arrive on time, take the designated time breaks to ensure efficiency and productivity.",
    },
    {
        id:2,
        name:'Manuel Daza Fonseca',
        job: 'Desarrollador Backend',
        img:'image/manu_f.jpg',
        text:"Customer focus and customer service is the key to building everlasting relationships with customers. Therefore, employees need to acquire skills that will help foster an enriching customer experience.",
    },
    {
        id:3,
        name:'Camila Robledos',
        job: 'Desarrollador Backend',
        img:'https://placebeard.it/640x360',
        text:"An employee’s work ethics involves everything from coming in time, working diligently, being honest to respecting everyone in the workplace. Analysing an employee’s ethical behaviour helps ensure that demotivating and inappropriate behaviour in the workplace is stopped from spreading",
    },
    {
        id:4,
        name:'Jeronimo Palacios',
        job: 'Desarrollador Backend',
        img:'https://placebear.com/640/360', 
        text: "The quality and quantity of work put in by an employee against the expectations set by the employer is the measurement of his/her productivity.",
    },
    {
        id:5,
        name:'Oscar Medina',
        job: 'Analisis y Desarrollo de sitemas de informacion',
        img:'image/oskr.jpg', 
        text: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum quis aut earum distinctio sequi Consectetur, unde incidunt, doloremque deserunt officiis illum veniam beatae obcaecati animialiquid at deleniti, ipsam error!Nulla corrupti laudantium"
    }
];

// select items

const img= document.getElementById("person-img");
const author = document.getElementById("author");
const job= document.getElementById("job");
const info = document.getElementById("info");

const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');
const randomBtn = document.querySelector('.random-btn');

//set starting item
let currentItem = 0;

//load intial item
window.addEventListener("DOMContentLoaded", function(){
    showPerson();

});

// show person based on item

function showPerson(){
    const item = reviews[currentItem];
    img.src= item.img;
    author.textContent =item.name;
    job.textContent = item.job;
    info.textContent = item.text;  
}

//show next person

nextBtn.addEventListener('click',function(){
    currentItem++
    if(currentItem > reviews.length - 1){
        currentItem = 0;
    };
    showPerson();
});

// show prev person

prevBtn.addEventListener('click',function(){
    currentItem--;
    if(currentItem < 0){
        currentItem = reviews.length - 1;
    };
    
    showPerson();
});

//show random person

randomBtn.addEventListener('click',function(){
    currentItem = Math.floor(Math.random() * reviews.length); 
    console.log(currentItem);
    showPerson();
    
});