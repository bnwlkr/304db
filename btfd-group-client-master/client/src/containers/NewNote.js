import React, { Component } from "react";
import { FormGroup, FormControl, ControlLabel } from "react-bootstrap";
import LoaderButton from "../components/LoaderButton";
// import config from "../config";
import "./NewNote.css";

export default class NewNote extends Component {
    constructor(props) {
        super(props);

        this.file = null;

        this.state = {
            isLoading: null,
            content: ""
        };
    }

    validateForm() {
        return this.state.content.length > 0;
    }

    handleChange = event => {
        this.setState({
            [event.target.id]: event.target.value
        });
    }

    handleFileChange = event => {
        this.file = event.target.files[0];
    };

    handleSubmit = async event => {
        event.preventDefault();

        if (this.file > 500000000000) { // && this.file.size > config.MAX_ATTACHMENT_SIZE) {
            alert("Please pick a file smaller than 5MB");
            return;
        }

        this.setState({ isLoading: true });

        try {
            await this.createNote({
                content: this.state.content
            });
            this.props.history.push("/");
        } catch (e) {
            alert(e);
            this.setState({ isLoading: false });
        }
    };

    createNote(note) {
        var request = new XMLHttpRequest();
        request.open('POST', '/my/url', true); // TODO: Recreate functionality into stock info get requests
        request.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');
        request.send(note);
    }

    render() {
        return (
            <div className="NewNote">
                <form onSubmit={this.handleSubmit}>
                    <FormGroup controlId="content">
                        <FormControl
                            onChange={this.handleChange}
                            value={this.state.content}
                            componentClass="textarea"
                        />
                    </FormGroup>
                    <FormGroup controlId="file">
                        <ControlLabel>Attachment</ControlLabel>
                        <FormControl onChange={this.handleFileChange} type="file" />
                    </FormGroup>
                    <LoaderButton
                        block
                        bsStyle="primary"
                        bsSize="large"
                        disabled={!this.validateForm()}
                        type="submit"
                        isLoading={this.state.isLoading}
                        text="Create"
                        loadingText="Creating…"
                    />
                </form>
            </div>
        );
    }
}