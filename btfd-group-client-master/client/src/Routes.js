import React from "react";
import AppliedRoute from "./components/AppliedRoute";
import { Route, Switch } from "react-router-dom";
import Home from "./containers/Home";
import Login from "./containers/Login";
import Signup from "./containers/Signup";
import NotFound from "./containers/NotFound"
import NewNote from "./containers/NewNote";
import Preferences from "./containers/Preferences";
import Reference from "./containers/Reference";

export default ({ childProps }) =>
    <Switch>
        <AppliedRoute path="/" exact component={Home} props={childProps} />
        <AppliedRoute path="/login" exact component={Login} props={childProps} />
        <AppliedRoute path="/signup" exact component={Signup} props={childProps} />
        <AppliedRoute path="/preferences" exact component={Preferences} props={childProps} />
        <AppliedRoute path="/api" onEnter={ {isReference: true} } onLeave={{ isReference: false }} exact component={Reference} props={childProps} />
        <AppliedRoute path="/notes/new" exact component={NewNote} props={childProps} />
        { /* Finally, catch all unmatched routes */ }
        <Route component={NotFound} />
    </Switch>;