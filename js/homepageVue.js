const main = Vue.createApp({

    // Data Properties
    data() {
        return {
            city_name: '',
            current_hr: '',
            current_min: '',
            current_ampm: '',
            weather_widget_html: '',
            current_weather_main: '',
            rain_arr : ['Thunderstorm', 'Drizzle', 'Rain'],
            sun_arr : ['Clear'],
            cloud_arr : ['Clouds'],
            quote: '',
            // quotes: {
            //     rain: "Seems like it's raining outside, remember to bring an umbrella with you!",
            //     sun: "It's a clear sky and might be sunny! Be sure to hydrate youself outside!",
            //     cloud: "Though it is cloudy outside, hang in there while the blue sky is coming!",
            //     weird : "The weather is uhm...better just stay in for now!",
            // },
        
        }
    },

    created: function(){
        this.get_geolocation_info()
        this.interval = setInterval(() => this.get_geolocation_info(), 60000);
    },

    methods: {
    
        get_geolocation_info(){
            let base_url = "https://api.ipgeolocation.io/ipgeo?apiKey=1d07ba53a9e34732961d93566352a4ec"
            axios.get(base_url)
                .then(response => {
                    this.city_name = response.data.country_name
                    // console.log(this.city_name)
                    let time_info = response.data.time_zone.current_time.split(' ')
                    let time_in_24hr = time_info[1].split('.')[0].slice(0,5)
                    let hour_time_in_24hr = time_in_24hr.slice(0,2)
                    let minutes_time_in_24hr = time_in_24hr.slice(3,5)
                    // console.log(time_in_24hr)
                    let pm_or_am = 'AM'
                    if(hour_time_in_24hr>12){
                        pm_or_am = 'PM'
                        hour_time_in_24hr = hour_time_in_24hr - 12
                    }
                    this.current_hr = hour_time_in_24hr
                    this.current_min = minutes_time_in_24hr
                    this.current_ampm = pm_or_am
                    this.create_weather_widget()
                    this.get_weather_info_openapi()
                })
                .catch(error => {
                    console.log(error.message)
                })
        },

        get_weather_info_openapi(){
            let city_name_widget = this.city_name
            if(city_name_widget=='South Korea'){
                city_name_widget = 'Seoul'
            }
            console.log(city_name_widget)
            let base_url = `http://api.openweathermap.org/data/2.5/weather?q=${city_name_widget}&appid=93245abbc690975102afc71ff2463a7f`
            axios.get(base_url)
                .then(response => {
                    this.current_weather_main = response.data.weather[0].main
                    if(this.rain_arr.includes(this.current_weather_main)){
                        this.current_weather_main = 'Rainy Day'
                        this.quote = "Seems like it's raining outside, remember to bring an umbrella with you!"
                    }
                    else if(this.sun_arr.includes(this.current_weather_main)){
                        this.current_weather_main = 'Sunny Day'
                        this.quote = "It's a clear sky and might be sunny! Be sure to hydrate youself outside!"

                    }
                    else if(this.cloud_arr.includes(this.current_weather_main)){
                        this.current_weather_main = 'Cloudy Day'
                        this.quote = "Though it is cloudy outside, hang in there while the blue sky is coming!"

                    }
                    else{
                        this.current_weather_main = 'Foggy Day'
                        this.quote = "The weather foggy, better stay in for now!"
                    }
                })
                .catch(error => {
                    this.current_weather_main = 'Sunny Day'
                    this.quote = "It's a clear sky and might be sunny! Be sure to hydrate youself outside!"
                    console.log(error.message)
                })
        },



        create_weather_widget(){
            let city_name_widget = this.city_name.toLowerCase()
            // console.log(city_name_widget)
            if(city_name_widget=='malaysia'){
                this.weather_widget_html = `
                <a class="weatherwidget-io" href="https://forecast7.com/en/4d21101d98/malaysia/" data-label_1="MALAYSIA" data-label_2="WEATHER" data-font="Roboto Slab" data-icons="Climacons Animated" data-mode="Current" data-theme="weather_one" >MALAYSIA WEATHER</a>
                `
            }
            else if(city_name_widget=='indonesia'){
                this.weather_widget_html = `
                <a class="weatherwidget-io" href="https://forecast7.com/en/n0d79113d92/indonesia/" data-label_1="INDONESIA" data-label_2="WEATHER" data-font="Roboto Slab" data-icons="Climacons Animated" data-mode="Current" data-theme="weather_one" >INDONESIA WEATHER</a>
                `
            }
            else if(city_name_widget=='philippines'){
                this.weather_widget_html = `
                <a class="weatherwidget-io" href="https://forecast7.com/en/12d88121d77/philippines/" data-label_1="PHILIPPINES" data-label_2="WEATHER" data-font="Roboto Slab" data-icons="Climacons Animated" data-mode="Current" data-theme="weather_one" >PHILIPPINES WEATHER</a>         `
            }
            else if(city_name_widget=='thailand'){
                this.weather_widget_html = `
                <a class="weatherwidget-io" href="https://forecast7.com/en/15d87100d99/thailand/" data-label_1="THAILAND" data-label_2="WEATHER" data-font="Roboto Slab" data-icons="Climacons Animated" data-mode="Current" data-theme="weather_one" >THAILAND WEATHER</a>             `
            }
            else if(city_name_widget=='south korea'){
                this.weather_widget_html = `
                <a class="weatherwidget-io" href="https://forecast7.com/en/35d91127d77/south-korea/" data-label_1="SOUTH KOREA" data-label_2="WEATHER" data-font="Roboto Slab" data-icons="Climacons Animated" data-mode="Current" data-theme="weather_one" >SOUTH KOREA WEATHER</a>
                `
            }
            else{
                this.weather_widget_html = `
                <a class="weatherwidget-io" href="https://forecast7.com/en/1d35103d82/singapore/" data-label_1="SINGAPORE" data-label_2="WEATHER" data-font="Roboto Slab" data-icons="Climacons Animated" data-mode="Current" data-theme="weather_one" >SINGAPORE WEATHER</a>
                `
            }
        }
    },


})

// Link this Vue instance with <div id="main">
main.mount("#main")