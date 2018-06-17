import React, { Component, Fragment } from "react";
import {
    HelpBlock,
    FormGroup,
    FormControl,
    ControlLabel
} from "react-bootstrap";
import LoaderButton from "../components/LoaderButton";
import { PageHeader } from "react-bootstrap";
import "./Preferences.css";
// import { Auth } from "aws-amplify";

export default class Preferences extends Component {

    constructor(props) {
        super(props);

        this.state = {
            isLoading: false,
            email: "",
            password: "",
            confirmPassword: "",
            confirmationCode: "",
            newUser: null
        };
    }

    validateForm() {
        return (
            this.state.email.length > 0 &&
            this.state.password.length > 0 &&
            this.state.password === this.state.confirmPassword
        );
    }

    validateConfirmationForm() {
        return this.state.confirmationCode.length > 0;
    }

    handleChange = event => {
        this.setState({
            [event.target.id]: event.target.value
        });
    }

    handleSubmit = async event => {
        event.preventDefault();

        this.setState({ isLoading: true });

        try {
            const newUser = await 8 // Auth.signUp({
            // username: this.state.email,
            // password: this.state.password
            // });
            this.setState({
                newUser
            });
        } catch (e) {

            /* if (e === UsernameExistsException) {
                // Auth.resentSignUp()
            } */
            alert(e.message);
        }

        this.setState({ isLoading: false });
    }

    handleConfirmationSubmit = async event => {
        event.preventDefault();

        this.setState({ isLoading: true });

        try {
            await 6; // Auth.confirmSignUp(this.state.email, this.state.confirmationCode);
            await 7; // Auth.signIn(this.state.email, this.state.password);

            this.props.userHasAuthenticated(true);
            this.props.history.push("/");
        } catch (e) {
            alert(e.message);
            this.setState({ isLoading: false });
        }
    }

    handleConfirmationSubmit = async event => {
        event.preventDefault();

        this.setState({ isLoading: true });
    }

    renderConfirmationForm() {
        return (
            <form onSubmit={this.handleConfirmationSubmit}>
                <FormGroup controlId="confirmationCode" bsSize="large">
                    <ControlLabel>Confirmation Code</ControlLabel>
                    <FormControl
                        autoFocus
                        type="tel"
                        value={this.state.confirmationCode}
                        onChange={this.handleChange}
                    />
                    <HelpBlock>Please check your email for the code.</HelpBlock>
                </FormGroup>
                <LoaderButton
                    block
                    bsSize="large"
                    disabled={!this.validateConfirmationForm()}
                    type="submit"
                    isLoading={this.state.isLoading}
                    text="Verify"
                    loadingText="Verifying…"
                />
            </form>
        );
    }

    renderForm() {
        return (
            <Fragment>
                <PageHeader>Change account details</PageHeader>
                <br></br>
                <br></br>
                <br></br>
        <form onSubmit={this.handleSubmit}>
            <FormGroup controlId="email" bsSize="large">
                <ControlLabel>Enter new email</ControlLabel>
                <FormControl
                    autoFocus
                    type="email"
                    value={this.state.email}
                    onChange={this.handleChange}
                />
            </FormGroup>
            <FormGroup controlId="password" bsSize="large">
                <ControlLabel>Enter new password</ControlLabel>
                <FormControl
                    value={this.state.password}
                    onChange={this.handleChange}
                    type="password"
                />
            </FormGroup>
            <FormGroup controlId="confirmPassword" bsSize="large">
                <ControlLabel>Confirm new password</ControlLabel>
                <FormControl
                    value={this.state.confirmPassword}
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
                text="Save Preferences"
                loadingText="Saving…"
            />
        </form>
        <br></br>
        <br></br>
        <PageHeader>More to come...</PageHeader>
        </Fragment>
        );
    }

    render() {
        return (
            <div className="Details">
                {this.state.newUser === null
                    ? this.renderForm()
                    : this.renderConfirmationForm()}
            </div>
        );
    }
}