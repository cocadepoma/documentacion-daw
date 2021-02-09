import React, { Component } from "react";
import "../styles/favourites.scss";
import Loading from "../components/loading";

export default class Favourites extends Component {
    state = {
        data: [],
        reload: false,
        loading: true,
    };
    Favourite = () => {};
    async componentDidMount() {
        const cities = Object.keys(localStorage);
        const weatherData = [];
        for (const i in cities) {
            const url = `http://api.weatherbit.io/v2.0/current?lang=es&city=${cities[i]}&key=6a462800af714dedb16e42364933f4ba`;
            const resp = await fetch(url);
            const data = await resp.json();

            weatherData.push(data.data[0]);
        }
        this.setState({ data: weatherData, cities: cities, loading: false });
    }

    render() {
        if (this.state.loading) {
            return <Loading />;
        }

        if (this.state.data.length === 0 && !this.state.loading) {
            return <h1 className="text-white text-center">No hay favoritos</h1>;
        } else {
            return (
                <div>
                    <ul className="favourites">
                        {this.state.data.map((cityWeather, i) => {
                            return (
                                <li
                                    id={this.state.cities[i]}
                                    key={this.state.cities[i]}
                                    className="animate__animated animate__fadeIn"
                                >
                                    <div className="wrapper-li d-flex justify-content-between align-items-center">
                                        <div>
                                            <button
                                                onClick={() => {
                                                    localStorage.removeItem(this.state.cities[i]);
                                                    document
                                                        .getElementById(this.state.cities[i])
                                                        .classList.remove("animate__fadeIn");
                                                    document
                                                        .getElementById(this.state.cities[i])
                                                        .classList.add("animate__fadeOut", "animate__faster");
                                                    setTimeout(() => {
                                                        this.componentDidMount();
                                                    }, 300);
                                                }}
                                                type="button"
                                                className="btn btn-danger btn-circle"
                                            >
                                                <i className="fas fa-times"></i>
                                            </button>
                                        </div>
                                        <div className="d-flex justify-content-between align-items-center mt-1">
                                            <h6>{cityWeather.city_name}</h6>
                                            <h4 className="ms-4">{Math.round(cityWeather.temp)} °C</h4>
                                        </div>

                                        <div className="d-flex flex-column align-items-center">
                                            <img
                                                src={process.env.PUBLIC_URL + `/icons/${cityWeather.weather.icon}.png`}
                                                alt={`icon-`}
                                            />
                                            <p className="info-weather">{cityWeather.weather.description}</p>
                                        </div>
                                    </div>
                                </li>
                            );
                        })}
                    </ul>
                </div>
            );
        }
    }
}
