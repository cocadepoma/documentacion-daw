import React, { Component } from "react";
import DayWeather from "../components/dayWeather";
import Loading from "../components/loading";
import { withRouter, Redirect } from "react-router-dom";

class City extends Component {
    state = {
        loading: true,
        weather1: {},
        weather2: {},
    };
    async componentDidMount() {
        var param = window.location.pathname;
        var array = param.split("/");
        var city = "";
        if (array.length > 2) {
            city = array[2];
        } else {
            city = this.props.city;
        }
        const url = `http://api.weatherbit.io/v2.0/current?lang=es&city=${city}&key=6a462800af714dedb16e42364933f4ba`;
        const url2 = `http://api.weatherbit.io/v2.0/forecast/daily?key=6a462800af714dedb16e42364933f4ba&lang=es&days=1&city=${city}&units=M`;

        try {
            const [weather1, weather2] = await Promise.all([
                fetch(url).then((resp) => resp.json()),
                fetch(url2).then((resp) => resp.json()),
            ]);
            this.setState({ weather1: weather1.data[0], weather2: weather2.data[0], fetchOk: true });
        } catch (err) {
            console.log(err);
            this.setState({ fetchOk: false });
        }

        if (this.state.fetchOk) {
            setTimeout(() => {
                this.setState({ loading: false, city: city });
            }, 300);
        }
    }

    render() {
        if (this.state.fetchOk === false) {
            return <Redirect to="/home" props={{ error: true }} />;
        }
        return (
            <div className="container">
                <div className="background-image"></div>
                {this.state.loading ? (
                    <Loading />
                ) : (
                    <DayWeather city={this.state.city} weather1={this.state.weather1} weather2={this.state.weather2} />
                )}
            </div>
        );
    }
}
export default withRouter(City);
