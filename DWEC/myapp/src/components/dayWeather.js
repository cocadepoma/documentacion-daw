import React, { Component } from "react";
import "../styles/dayWeather.scss";
import Slider from "./slider";
import swal from "@sweetalert/with-react";

export default class DayWeather extends Component {
    async componentDidMount() {
        const url = `http://api.weatherbit.io/v2.0/forecast/hourly?key=6a462800af714dedb16e42364933f4ba&lang=es&city=${this.props.city}`;
        const data = await fetch(url).then((response) => response.json());

        let newdata = [];
        for (const i in data.data) {
            const date = new Date(data.data[i].ts * 1000);
            let temp = {
                id: i,
                time: date.toLocaleTimeString([], { timeStyle: "short" }),
                temp: Math.round(data.data[i].temp),
                icon: data.data[i].weather.icon,
            };
            newdata.push(temp);
        }

        this.setState({ slides: <Slider newdata={newdata} /> });
    }
    trasnformToDate() {
        const date = new Date(this.props.weather1.ts * 1000);
        return date.toLocaleDateString();
    }
    transformToTime() {
        const date = new Date(this.props.weather1.ts * 1000);
        return date.toLocaleTimeString();
    }
    state = {
        date: this.props.weather1.ts,
        city: this.props.weather1.city_name,
        temp: this.props.weather1.temp,
        sunrise: this.props.weather1.sunrise,
        sunset: this.props.weather1.sunset,
        press: this.props.weather1.pres,
        description: this.props.weather1.weather.description,
        icon: this.props.weather1.weather.icon + ".png",
        clouds: this.props.weather1.clouds,
        max_temp: this.props.weather2.max_temp,
        min_temp: this.props.weather2.min_temp,
        pop: this.props.weather2.pop,
        uv: this.props.weather2.uv,
        wind: this.props.weather1.wind_spd,
        ozone: this.props.weather2.ozone,
        humidity: this.props.weather1.rh,
        visibility: this.props.weather1.vis,
        slides: [],
    };
    render() {
        return (
            <div>
                <div className="weather-wrapper my-5 animate__animated animate__fadeIn animate__faster">
                    <h3 className="text-center">
                        {this.state.city}, {this.trasnformToDate()}
                    </h3>
                    <div className="header-weather">
                        <div className="timegif">
                            <img src={process.env.PUBLIC_URL + `/icons/${this.state.icon}`} alt="icon-time" />
                            <p className="text-center mt-2">{this.state.description}</p>
                        </div>
                        <div className="temperature">
                            <h2>{Math.round(this.state.temp)} °C</h2>
                        </div>
                    </div>
                    <div className="d">{this.state.slides}</div>
                    <div className="body-weather">
                        <p className="text-muted ps-2">Detalles del tiempo:</p>
                        <div className="body-weather-wrapper">
                            <div className="body-weather-left">
                                <p className="grid-details mb-2">
                                    <img
                                        className="ms-2 icon-temp"
                                        src={process.env.PUBLIC_URL + `/icons/max.png`}
                                        alt="icon-max"
                                    />
                                    <span>{Math.round(this.state.max_temp)} °C</span>
                                </p>
                                <p className="grid-details mb-2">
                                    <img
                                        className="ms-2 icon-temp"
                                        src={process.env.PUBLIC_URL + `/icons/min.png`}
                                        alt="icon-max"
                                    />
                                    <span>{Math.round(this.state.min_temp)} °C</span>
                                </p>
                                <p className="grid-details mb-2">
                                    <img
                                        className="icon"
                                        src={process.env.PUBLIC_URL + `/icons/sunrise.png`}
                                        alt="icon-max"
                                    />
                                    <span>{this.state.sunrise}</span>
                                </p>
                                <p className="grid-details mb-2">
                                    <img
                                        className="icon"
                                        src={process.env.PUBLIC_URL + `/icons/sunset.png`}
                                        alt="icon-min"
                                    />
                                    <span>{this.state.sunset}</span>
                                </p>
                                <p className="grid-details mb-2">
                                    <img
                                        className="icon"
                                        src={process.env.PUBLIC_URL + `/icons/pop.png`}
                                        alt="icon-min"
                                    />
                                    <span>{this.state.pop} %</span>
                                </p>
                                <p className="grid-details mb-2">
                                    <img
                                        className="icon"
                                        src={process.env.PUBLIC_URL + `/icons/humidity.png`}
                                        alt="icon-min"
                                    />
                                    <span>Humedad: {this.state.humidity} %</span>
                                </p>
                            </div>
                            <div className="body-weather-right">
                                <p className="grid-details mb-2">
                                    <img
                                        className="icon"
                                        src={process.env.PUBLIC_URL + `/icons/uv.ico`}
                                        alt="icon-min"
                                    />
                                    <span>Índice UV: {Math.round(this.state.uv)}</span>
                                </p>
                                <p className="grid-details mb-2">
                                    <img
                                        className="icon"
                                        src={process.env.PUBLIC_URL + `/icons/cloud.ico`}
                                        alt="icon-min"
                                    />
                                    <span>Nubosidad: {Math.round(this.state.clouds)} %</span>
                                </p>
                                <p className="grid-details mb-2">
                                    <img
                                        className="icon"
                                        src={process.env.PUBLIC_URL + `/icons/press.png`}
                                        alt="icon-min"
                                    />
                                    <span>Presión Atmosférica: {Math.round(this.state.press)} mb</span>
                                </p>
                                <p className="grid-details mb-2">
                                    <img
                                        className="icon"
                                        src={process.env.PUBLIC_URL + `/icons/wind.ico`}
                                        alt="icon-min"
                                    />
                                    <span>Viento: {Math.round(this.state.wind)} m/s</span>
                                </p>
                                <p className="grid-details mb-2">
                                    <img
                                        className="icon"
                                        src={process.env.PUBLIC_URL + `/icons/o3.png`}
                                        alt="icon-min"
                                    />
                                    <span>Ozono: {Math.round(this.state.ozone)} DU</span>
                                </p>
                                <p className="grid-details mb-2">
                                    <img
                                        className="icon"
                                        src={process.env.PUBLIC_URL + `/icons/visi.png`}
                                        alt="icon-min"
                                    />
                                    <span>Visibilidad: {this.state.visibility} km</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div className="footer-weather d-flex justify-content-between align-items-center">
                        <p className="last-update m-0">Última Actualización: {this.transformToTime()} </p>
                        <button
                            onClick={() => {
                                localStorage.setItem(this.state.city, JSON.stringify(this.state.city));
                                swal({
                                    title: "Ciudad agregada con éxito!",
                                    text: "Ahora la tendrás en favoritos",
                                    icon: "success",
                                    timer: 1800,
                                });
                            }}
                            type="button"
                            className="btn btn-success btn-circle"
                        >
                            <i className="far fa-save"></i>
                        </button>
                    </div>
                </div>
            </div>
        );
    }
}
