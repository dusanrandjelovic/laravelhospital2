import React, {Component} from 'react'

class Api extends Component{

   constructor(){
       super()
       this.state = {
           podaci: {}
       }
   }

   componentDidMount(){
      fetch(`https://api.openweathermap.org/data/2.5/weather?q=${grad}&units=metric&lang=hr&appid=6e8fd375562bf0578b68cdbfca4821c3`)
    .then(response => response.json())
    .then(data => {
        this.setState({
            podaci: data
        })
    })
  }


    render(){
        const stil = {
            textAlign: 'center',
           }

        return(
       <div>
            <div id="prvideo">
            <h1 style={stil}>{this.props.naslov}</h1>
            <p>Ukucajte ime grada na engleskom. Primer: Belgrade ili Moscow.</p>
            <p>Ako grad nema prevod napišite ime u originalu. Primer: Novi Sad.</p>
            <div>
            <input type="text" id="grad" placeholder="Grad..."/>
            <button type="submit" onClick={upis} id="dugme">Prognoza</button>
            </div>

           </div>
    <div id="drugideo">

        <div id="podacilevo">

        </div>
        <div id="podacidesno">

        </div>

    </div>
    <div id="trecideo">


       <section>
        <div id="narednidani"></div>
    </section>


        </div>

        </div>
        )
    }
}

export default Api

function upis(){
    const grad = document.getElementById('grad').value;
    const podacilevo = document.getElementById('podacilevo');
    const podacidesno = document.getElementById('podacidesno');
    let sablon = ``;
    let sablon2 = ``;
    fetch(`https://api.openweathermap.org/data/2.5/weather?q=${grad}&units=metric&lang=hr&appid=6e8fd375562bf0578b68cdbfca4821c3`)
    .then(response => response.json())
    .then(data => {
     console.log(data);

         sablon += `
             <h2>Temperatura: ${data.main.temp.toFixed(0)} &#186 </h2>
             <h1>Grad: ${data.name}</h1>
         `;

         sablon2 += `
         <img src="${'https://openweathermap.org/img/w/' + data.weather[0].icon + '.png'}">
              <p>Opis: ${data.weather[0].description}</p>
              <p>Brzina vetra: ${data.wind.speed} m/s</p>
         `;

     podacilevo.innerHTML = sablon;
     podacidesno.innerHTML = sablon2;
    });


fetch(`https://api.openweathermap.org/data/2.5/forecast?q=${grad}&units=metric&lang=hr&appid=6e8fd375562bf0578b68cdbfca4821c3`)
.then(response => response.json())
.then(data2 => {
 console.log(data2);


 let sablon3 = ``;
 const today = new Date().toString().slice(0, 10);
 const timeOfDayForCond = '15:00:00';

 for (let i = 1; i <= 39; i++){
     if (data2.list[i].dt_txt.slice(0,10) != today && data2.list[i].dt_txt.slice(11,19) == timeOfDayForCond){
     sablon3 += `
     <div id="sutra">
             <p>${data2.list[i].dt_txt.slice(0,10)}</p>
             <img src="${'https://openweathermap.org/img/w/' + data2.list[i].weather[0].icon + '.png'}">
             <p class="predicted-weather-conditions">${data2.list[i].weather[0].description}</p>
             <p class="predicted-max">${data2.list[i].main.temp_max.toFixed(0) + "&#186"}</p>
     </div>`;
     }
 }
 narednidani.innerHTML = sablon3;



});

}
