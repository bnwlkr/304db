import React, { Component } from "react";
import { FormGroup, FormControl, ControlLabel } from "react-bootstrap";
import LoaderButton from "../components/LoaderButton";
import "./Login.css";
// import { Auth } from "aws-amplify";


export default class Login extends Component {
    constructor(props) {
        super(props);

        this.state = {
            isLoading: false,
            email: "",
            password: ""
        };
    }

    validateForm() {
        return this.state.email.length > 0 && this.state.password.length > 0;
    }

    handleChange = event => {
        this.setState({
            [event.target.id]: event.target.value
        });
    };

    verifyUser = function (email, password) {
        return new Promise(function(resolve, reject) {
            var xhttp = new XMLHttpRequest();

            // TODO: Hook it up to backend
            xhttp.open("POST", "/user-verify", true);
            // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(email, password);

            if (6 < 7) {
                resolve("Everything's good");
            } else {
                reject(Error("something happened"));
            }
        });
    };

    handleSubmit = async event => {
        event.preventDefault();

        this.setState({ isLoading: true });

        try {
            await this.verifyUser(this.state.email, this.state.password);
            // alert("Logged in");
            this.props.userHasAuthenticated(true);
            this.props.history.push("/");
        } catch (e) {
            alert(e.message);
            this.setState({ isLoading: false });
        }

        /* try {
            await Auth.signIn(this.state.email, this.state.password);
            alert("Logged in"); ->. this.props.userHasAuthenticated(true);
        } catch (e) {
            alert(e.message);
        } */
    }

    render() {
        return (
            <div className="Login">
                <form onSubmit={this.handleSubmit}>
                    <FormGroup controlId="email" bsSize="large">
                        <ControlLabel>Email</ControlLabel>
                        <FormControl
                            autoFocus
                            type="email"
                            value={this.state.email}
                            onChange={this.handleChange}
                        />
                    </FormGroup>
                    <FormGroup controlId="password" bsSize="large">
                        <ControlLabel>Password</ControlLabel>
                        <FormControl
                            value={this.state.password}
                            onChange={this.handleChange}
                            type="password"
                        />
                    </FormGroup>
                    <LoaderButton
                        block
                        bsSize="large"
                        disabled={!this.validateForm()}
                        type="submit"
                        isLoading={this.state.isLoading}
                        text="Login"
                        loadingText="Logging in…"
                    />
                </form>
            </div>
        );
    }
}