import React, { Component } from "react";

import "../styles/index.scss";
import City from "./city";

export default class Home extends Component {
    render() {
        return (
            <div className="container">
                <City city={"castellon"} />
            </div>
        );
    }
}
