let yearsSelect = document.getElementById('years-select')
let daysSelect = document.getElementById('days-select')
let monyhsSelect = document.getElementById('months-select')
let months = 
[
	{
		"abbreviation": "Jan",
		"name": "January"
	},
	{
		"abbreviation": "Feb",
		"name": "February"
	},
	{
		"abbreviation": "Mar",
		"name": "March"
	},
	{
		"abbreviation": "Apr",
		"name": "April"
	},
	{
		"abbreviation": "May",
		"name": "May"
	},
	{
		"abbreviation": "Jun",
		"name": "June"
	},
	{
		"abbreviation": "Jul",
		"name": "July"
	},
	{
		"abbreviation": "Aug",
		"name": "August"
	},
	{
		"abbreviation": "Sep",
		"name": "September"
	},
	{
		"abbreviation": "Oct",
		"name": "October"
	},
	{
		"abbreviation": "Nov",
		"name": "November"
	},
	{
		"abbreviation": "Dec",
		"name": "December"
	}
]

let years = ''
for(let i = 1900 ; i<=2022 ; i++){
   years += `<option value = '${i}'>${i}</option>`
}
yearsSelect.innerHTML = years


let days = ''
for(let i = 1 ; i<=31 ; i++){
   days += `<option value = '${i}'>${i}</option>`
}
daysSelect.innerHTML = days


let monthes = ''
months.map((month)=>{
    monthes += `<option value = '${month.abbreviation}'>${month.name}</option>`
})
monyhsSelect.innerHTML = monthes







