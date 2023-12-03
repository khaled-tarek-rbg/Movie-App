let barsList = document.querySelector('.bars-list')
let elipseIcon = document.querySelector('.elipsisIcon')
elipseIcon.addEventListener('click' ,()=>{
   search.classList.toggle('active')
   leftSidebar.classList.toggle('active')
   elipseIcon.querySelector('svg').classList.contains('fa-ellipsis-h')?elipseIcon.querySelector('svg').classList.replace('fa-ellipsis-h' , 'fa-times'):elipseIcon.querySelector('svg').classList.replace('fa-times' , 'fa-ellipsis-h')
})
barsList.style.maxHeight = "0px";

barsList.addEventListener('click' , (e)=>{
e.stopPropagation();
})



let navItems = Array.from(document.querySelectorAll('.nav-item.active-item'));
navItems.map((link , index)=>{
    link.addEventListener('click' , ()=>{


    link.classList.add('active')
    if(index == 0){
        link.nextElementSibling.classList.remove('active')
    }
    else if(index == navItems.length - 1){
        link.previousElementSibling.classList.remove('active')
    }
    else{
        link.nextElementSibling.classList.remove('active')
        link.previousElementSibling.classList.remove('active')
    }

    })
})



let bars = document.querySelector('.bars')


let prev = document.querySelector('.prev')
let next = document.querySelector('.next')
let movieSlider = document.querySelector('.movie-slider .row')
let thumbsUp = document.querySelectorAll('.movie-icon')
let search = document.querySelector('.right-sidebar')
let leftSidebar = document.querySelector('.left-sidebar')
let dropDowns = document.querySelectorAll('.drop-down');
let categories =  document.querySelectorAll('.right-sidebar .categories')

let filterForms  = document.querySelectorAll('.choose-filter')
let formDropDownIcons = document.querySelectorAll('.form-drop-down')


let filterDropDowns = document.querySelectorAll('.filter-drop-down')
let years = document.querySelectorAll('.years')
let closeDowns = document.querySelectorAll('.closebtn')
let Svgs = document.querySelectorAll('.drop-down svg')


let qualityDropDown =  document.querySelector('.qualities');
let quality =  document.querySelector('.all-qualities');
// let showMore =  document.querySelector('.show-more');
// let moreInterests =  document.querySelector(".more-interests");
// let moreLanguages =  document.querySelector(".more-languages");
// let showLess =  document.querySelector('.show-less');
let upBtn =  document.querySelector('.go-up');






// let interestDropDown =  document.querySelector('.interests');
// let interest =  document.querySelector('.all-interests');

let countriesDropDown =  document.querySelector('.countries');
let country =  document.querySelector('.all-countries');
let languagesDropDown =  document.querySelector('.languages');
let language =  document.querySelector('.all-languages');








quality.style.maxHeight = "0px"
// interest.style.maxHeight = "0px"
country.style.maxHeight = "0px"
// language.style.maxHeight = "0px"


bars.addEventListener('click' , ()=>{
    barsList.style.maxHeight == "0px" ? barsList.style.maxHeight = "300px" : barsList.style.maxHeight = "0px"
})




qualityDropDown.addEventListener('click' , ()=>{
    quality.style.maxHeight == "0px" ? quality.style.maxHeight = "600px" : quality.style.maxHeight = "0px"


    document.querySelector('.qualities svg').classList.contains('fa-angle-right')?document.querySelector('.qualities svg').classList.replace('fa-angle-right' , 'fa-angle-down'):document.querySelector('.qualities svg').classList.replace('fa-angle-down' , 'fa-angle-right')
 })
countriesDropDown.addEventListener('click' , ()=>{
    country.style.maxHeight == "0px" ? country.style.maxHeight = "600px" : country.style.maxHeight = "0px"


    document.querySelector('.countries svg').classList.contains('fa-angle-right')?document.querySelector('.countries svg').classList.replace('fa-angle-right' , 'fa-angle-down'):document.querySelector('.countries svg').classList.replace('fa-angle-down' , 'fa-angle-right')
})

// languagesDropDown.addEventListener('click' , ()=>{
//     language.style.maxHeight == "0px" ? language.style.maxHeight = "600px" : language.style.maxHeight = "0px"


//     document.querySelector('.languages svg').classList.contains('fa-angle-right')?document.querySelector('.languages svg').classList.replace('fa-angle-right' , 'fa-angle-down'):document.querySelector('.languages svg').classList.replace('fa-angle-down' , 'fa-angle-right')
// })











// interestDropDown.addEventListener('click' , ()=>{
//     console.log('good');
//     interest.style.maxHeight == "0px" ? interest.style.maxHeight = "600px" : interest.style.maxHeight = "0px"


//     document.querySelector('.interests svg').classList.contains('fa-angle-right')?document.querySelector('.interests svg').classList.replace('fa-angle-right' , 'fa-angle-down'):document.querySelector('.interests svg').classList.replace('fa-angle-down' , 'fa-angle-right')
// })










// let showItems = document.querySelectorAll('.show-item');

// let showMoreItem = document.querySelector('.show-more')

// showMoreItem.addEventListener("click" , ()=>{
//     showItems.forEach((item)=>{
//         item.classList.toggle('none')

//     })
//     showMoreItem.innerText == "show more" ? showMoreItem.innerText = "show less" : showMoreItem.innerText = "show more"
// })










categories.forEach((category)=>{
    category.style.maxHeight = "0px";  //0 ,1
})




dropDowns.forEach((dropDown , index)=>{ //0,1

    dropDown.addEventListener('click' , ()=>{
        categories[index].style.maxHeight == "0px" ?
        categories[index].style.maxHeight = "200px" :
        categories[index].style.maxHeight = "0px";

     dropDown.querySelector('svg').classList.contains('fa-angle-right')?
     dropDown.querySelector('svg').classList.replace('fa-angle-right' , 'fa-angle-down' ) :dropDown.querySelector('svg').classList.replace('fa-angle-down' , 'fa-angle-right' )
    })
})






years.forEach((year)=>{
    year.style.maxHeight = "0px"
})





filterDropDowns.forEach((filterDropDown , index)=>{

    filterDropDown.addEventListener('click' , () =>{

            years[index].style.maxHeight == "0px" ? years[index].style.maxHeight = "400px" : ''


    })
})




closeDowns.forEach((closeDown , index)=>{

    closeDown.addEventListener('click' , (e)=>{
            e.stopPropagation()

                years[index].style.maxHeight = "0px"

        })
})



filterForms.forEach((filterForm)=>{
    filterForm.style.maxHeight = "0px"
})

formDropDownIcons.forEach((formDropDownIcon , index)=>{

    formDropDownIcon.addEventListener('click' , ()=>{


            filterForms[index].style.maxHeight == "0px" ? filterForms[index].style.maxHeight = "400px" :
            filterForms[index].style.maxHeight = "0px"


    })
})



// let count = 0
// let hiddenInterests = document.querySelectorAll('.all-interests button.none') //
// moreInterests.addEventListener('click' , ()=>{


//     for(let i = count ; i < count+5 ; i++){

//         if(i == hiddenInterests.length){
//             moreInterests.style.display = 'none'
//             return

//         }

//         hiddenInterests[i].classList.toggle('none')


//     }

//     count+=5;



// })




// let start = 0
// let hiddenLanguages = document.querySelectorAll('.all-languages button.none') //
// moreLanguages.addEventListener('click' , ()=>{


//     for(let i = count ; i < count+5 ; i++){

//         if(i == hiddenLanguages.length){
//             moreLanguages.style.display = 'none'
//             return

//         }

//         hiddenLanguages[i].classList.toggle('none')


//     }

//     count+=5;



// })


















// countryApi()
// function countryApi(){
//     fetch('https://restcountries.com/v3.1/all')
//     .then((res)=>res.json()
//     .then((data)=>dispalyCountries(data))
//     )
// }
// function dispalyCountries(countries){
//     console.log(countries);
//     let design = ''
//     let count = 0
//     for(let i = count ; i < count+10 ; i++ ){
//         design += `
//         <button>
//             ${countries[i].name.common}
//         </button>

//     `
//     }
//     for(let i = 10 ; i < countries.length ; i++){
//         design+= `
//         <button class ='none'>
//         ${countries[i].name.common}
//         </button>
//         `
//     }
//     document.querySelector('.all-countries').innerHTML = design
//     document.querySelector('.all-countries').innerHTML += `
//         <button class = 'more-countries'>show more
//         <i class="fas fa-plus"></i>
//         </button>
//     `
//     let moreCountries = document.querySelector('.more-countries')
//     let hiddenCountries = document.querySelectorAll('.all-countries button.none')
//     let counter = count+10
//     moreCountries.addEventListener('click' , ()=>{
//         for(let i = counter ; i < counter+10 ; i++){
//             if(i == hiddenCountries.length){
//                 moreCountries.style.display = 'none'
//                 return
//             }
//             hiddenCountries[i].classList.remove('none')
//         }

//         counter+=10
//     })
// }


upBtn.addEventListener('click' , ()=>{

    search.scrollTo({top: 0, behavior: 'smooth'});

})
next.addEventListener('click' , ()=>{
    movieSlider.scrollBy({
        left : 200 ,
        behavior : 'smooth'
    })
})
prev.addEventListener('click' , ()=>{
    movieSlider.scrollBy({
        left : -200 ,
        behavior : 'smooth'
    })
})


thumbsUp.forEach((ele)=>{
    ele.addEventListener('click' , ()=>{
        if( ele.querySelector('svg').getAttribute('data-prefix') === 'far'){
            ele.querySelector('svg').setAttribute('data-prefix' , 'fas')
            ele.querySelector('svg').classList.add('active')
        }else{
            ele.querySelector('svg').setAttribute('data-prefix' , 'far')
            ele.querySelector('svg').classList.remove('active')
        }

    })
})





