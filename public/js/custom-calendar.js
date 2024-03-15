class CustomCalendar extends HTMLElement {
    constructor() {
        super()
        this.attachShadow({mode: "open"})
        this.date = new Date();
        this.selectedDate = new Date()
    }

    connectedCallback() {
        const dateAttr = this.getAttribute("date")
        if (dateAttr) {
            this.date = new Date(dateAttr)
            this.selectedDate = new Date(dateAttr)
        }
        else {
            this.date = new Date();
            this.selectedDate = new Date();
        }

        this.render();
        this.renderCalendar();
        this.addEventListeners();
     }

     changeMonth(direction) {
        if(direction == 'prev') {
            this.date.setMonth( this.date.getMonth() -1);
    
        } 
        else if (direction == 'next'){
            this.date.setMonth(this.date.getMonth() + 1);
        }
        this.renderCalendar();
     }

     addEventListeners(){
        this.shadowRoot.querySelector('#prev-month')
        .addEventListener('click', () => this.changeMonth("prev"));
        this.shadowRoot.querySelector('#next-month')
        .addEventListener('click', () => this.changeMonth('next'))

     }

     render(){
        this.shadowRoot.innerHTML = ` <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"   /> 
        <style>
            :host{
                
            }
            .calendar-container{
                width: calc(100% - 60px); /* 100% - 2 * 30px */
                max-width: 880px;
                margin: 0 auto; /* Ajoutez cette ligne pour centrer horizontalement */
                background-color: #ffff;
                border: none;
                
                overflow: hidden;
                
                
            }
            .calendar-head{
                background-color: #fff;
                display:flex;
                justify-content: space-between;
                align-items :center;
                padding : 10px 20px;
            }

            .calendar-head h2{
                color : black;
                font-size : 24px;
                margin:0;
            }

            .calendar-head button {
                background-color: black;
                border-radius:10px;
                color: #ffff;
                font-size: 18px;
                cursor: pointer;
            }

            .calendar-grid {
                padding: 20px;
            }

            .days-names, .days {
                display: grid;
                grid-template-columns: repeat(7, 1fr);
                gap: 5px;
            }
            
            .days-names div, .days div {
                display: flex;
                justify-content: space-between;
                align-items: center;
                font-size: 25px;
                width: 40px;
                height: 40px;
                margin: 5px auto;
            }
            

            .days-times div {
                color: #333;
                padding-bottom: 8px;
                font-weight: bold;
                font-size: 1.07rem;
                border-radius : 50%;
            }

            .days div:hover{
                cursor : pointer;
                bacground-color: #2c3e50;
                color: #ffff;
                transition: 2s;
            }

            .days .today{
                background-color: #2c3e50;
                color: #ffff;
            }

            .days .prev-date,
            .days .next-date {
                color: #d3d3d3;
            }

            .calendar-container * {
                box-sizing: border-box;
            }

        </style>
        
        <div class="calendar-container">
            <div class="calendar-head">
                <button id="prev-month"><i class="fas fa-chevron-left" ></i></button>
                <h2 id="month-year"></h2>
                <button id="next-month"><i class="fas fa-chevron-right"></i></button>
            </div>
            <div class= "calendar-grid">
                <div class="days-names">
                    <div>D</div>
                    <div>L</div>
                    <div>M</div>
                    <div>M</div>
                    <div>J</div>
                    <div>V</div>
                    <div>S</div>
                </div>
                <div id="days" class="days"></div>
            </div>
        </div>

        `

     }

     handleDayClick(event){
        const clickedElement = event.target;
        const day = parseint(clickedElement.textContent, 10);

        if(
            !isNan(day) && 
            clickedElement.parentElement && 
            clickedElement.parentElement.id =="days" && 
            !clickedElement.classList.contains("prev-date") &&
            !clickedElement.classList.contains("next-days")
        ){
            this.selectedDate = new Date(this.date)
            this.selectedDate.setDate(day)
            //this.selectedDate("date", this.selectedDate.toIsoString().split("T")[0]);
            this.setAttribute("date", this.selectedDate.toISOString().split("T")[0])
            this.dispatchEvent(new CustomEvent("date-changed", {detail: this.selectedDate}));
            this.renderCalendar();
        }
     }

     renderCalendar() {
        const monthDays = this.shadowRoot.querySelector("#days")
        const lastDay = new Date(
            this.date.getFullYear(),
            this.date.getMonth() + 1,
            0
        ).getDate();   
        
        const prevLastDay = new Date(
            this.date.getFullYear(),
            this.date.getMonth(),
            0
        ).getDate(); 
    
        const firstDayIndex = new Date(this.date.getFullYear(), this.date.getMonth(), 1).getDay();

    
        const LastDayIndex = new Date(
            this.date.getFullYear(),
            this.date.getMonth(),
            0
        ).getDay(); 

        const newDays = 7 - LastDayIndex - 1;

        const months = [
            "Janvier",
            "Fevrier",
            "Mars",
            "Avril",
            "Mai",
            "Juin",
            "Juillet",
            "Aout",
            "Septembre",
            "Octobre",
            "Novembre",
            "Décembre"
        ]

        this.shadowRoot.querySelector("#month-year").innerHTML = months[this.date.getMonth()] + ' ' ;

        let days = "";

        for(let x = firstDayIndex; x > 0 ; x--) {
            days += `<div class="prev-date">${prevLastDay - x + 1}</div>`
        }

        for(let i = 1; i<= lastDay; i++){
            if(
                i == this.selectedDate.getDate() &&
                this.date.getDate() == this.selectedDate.getMonth() &&
                this.date.getFullYear() == this.selectedDate.getFullYear()
            ) {
                days += `<div class="today">${i}</div>`;
            } else{
                days += `<div>${i}</div>`;
            }
        }

        for (let j = 1; j <= newDays; j++) {
            days += `<div class="next-date">${j}</div>`;
        }
        

        monthDays.innerHTML = days;
        monthDays.addEventListener('click', (event) => this.handleDayClick(event));

        
     }

     
}

customElements.define('custom-calendar', CustomCalendar)