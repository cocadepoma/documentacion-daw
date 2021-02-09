import React, { Component } from "react";
import { NavLink } from "react-router-dom";

import "../styles/layout.scss";

export default class Layout extends Component {
    constructor(props) {
        super(props);
        this.state = {
            city: "",
            checked: false,
        };
        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }
    handleChange(e) {
        const city = e.target.value.trim();

        if (city.length > 2) {
            this.setState({ city: e.target.value });
        } else {
            this.setState({ city: "" });
        }
    }
    handleSubmit(event) {
        event.preventDefault();
        if (this.state.city.length > 2) {
            this.setState({ checked: true });
        }
    }

    render() {
        if (this.state.checked) {
            const path = `/city/${this.state.city}`;
            window.location.href = path;
        }

        return (
            <nav className="navbar navbar-expand-lg navbar-dark ">
                <div className="container-fluid">
                    <button
                        className="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span className="navbar-toggler-icon"></span>
                    </button>
                    <div className="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul className="nav-ul navbar-nav me-auto mb-2 mb-lg-0">
                            <NavLink className="nav-link" activeClassName="main-nav-active" to="/home">
                                Castellón
                            </NavLink>

                            <NavLink tag="li" className="nav-link" activeClassName="main-nav-active" to="/favourites">
                                Favoritos
                            </NavLink>

                            <NavLink className="nav-link" activeClassName="main-nav-active" to="/contact">
                                Contacto
                            </NavLink>
                        </ul>
                        <form className="city-form" onSubmit={this.handleSubmit}>
                            <div className="input-group">
                                <input
                                    className="city-input"
                                    type="text"
                                    placeholder="City..."
                                    onChange={this.handleChange}
                                    name="city"
                                />
                                <i className="fa fa-search city-btn"></i>
                            </div>
                        </form>
                    </div>
                </div>
            </nav>
        );
    }
}
