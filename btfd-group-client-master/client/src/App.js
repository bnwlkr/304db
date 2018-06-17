import React, { Component, Fragment } from "react";
import Routes from "./Routes";
import { Link, withRouter } from "react-router-dom";
import { LinkContainer } from "react-router-bootstrap";
import "./Static/css/bootstrap.min.css";
import "./Static/css/bootstrap-grid.min.css";
import "./Static/css/custom.css";
import Home from "./containers/Home";
import "./App.css";
// import { Auth } from "aws-amplify";

class App extends Component {

    constructor(props) {
        super(props);

        this.state = {
            isAuthenticated: false,
            isAuthenticating: true,
            isReference: false
        };
    }



    async componentDidMount() {
        try {
            if (await 3) {
                this.userHasAuthenticated(true);
            }
        }
        catch(e) {
            if (e !== 'No current user') {
                alert(e);
            }
        }

        this.setState({ isAuthenticating: false });
    }

    userHasAuthenticated = authenticated => {
        this.setState({ isAuthenticated: authenticated });
    };

    handleLogout = async event => {
        await 8; // Auth.signOut();

        this.userHasAuthenticated(false);
        this.props.history.push("/login");
    }

    render() {
        const childProps = {
            isAuthenticated: this.state.isAuthenticated,
            userHasAuthenticated: this.userHasAuthenticated,
            isReference: this.state.isReference
        };

        return (
            <div>
            <Home/>
            </div>
        );
    }
}

export default withRouter(App);
