
let movies = document.querySelectorAll('.dashboard-movies')
let moviesList = document.querySelectorAll('.admin-dashboard ul')


moviesList.forEach((movieList)=>{
    movieList.style.maxHeight = "0px"
})


movies.forEach((movie , index)=>{

    movie.addEventListener('click' , ()=>{
        moviesList[index].style.maxHeight == "0px" ?  moviesList[index].style.maxHeight = "350px" :  moviesList[index].style.maxHeight =  "0px" ;

        movie.querySelector('svg').classList.contains('fa-angle-right') ? movie.querySelector('svg').classList.replace('fa-angle-right', 'fa-angle-down') : movie.querySelector('svg').classList.replace('fa-angle-down','fa-angle-right')


    })
})

let elipsisIcon = document.querySelector('.elipsisIcon');
let leftSidebar = document.querySelector('.left-sidebar')

elipsisIcon.addEventListener('click', ()=>{
    leftSidebar.classList.toggle('active')
    elipsisIcon.querySelector('svg').classList.contains('fa-ellipsis-h') ? elipsisIcon.querySelector('svg').classList.replace('fa-ellipsis-h','fa-times') : elipsisIcon.querySelector('svg').classList.replace('fa-times' , 'fa-ellipsis-h' )
})





let barsList = document.querySelector('.bars-list')
barsList.style.maxHeight = "0px";
let bars = document.querySelector('.bars')
bars.addEventListener('click' , ()=>{
    barsList.style.maxHeight == "0px" ? barsList.style.maxHeight = "300px" : barsList.style.maxHeight = "0px"
})





