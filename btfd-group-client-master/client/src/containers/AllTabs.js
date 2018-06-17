import React, { Component } from "react";
import { PageHeader, ListGroup } from "react-bootstrap";
import "../Static/css/bootstrap.min.css";
import "../Static/css/bootstrap-grid.min.css";
import "../Static/css/custom.css";
import SearchAndButtons from"../components/SearchAndButtons/SearchAndButtons";
import ListOfCommodities from "../components/ListOfCommodities/ListOfCommodities";
import SearchResults from "../components/SearchResults/SearchResults";
import SellCommodity from "../components/SellCommodity/SellCommodity";
import BuyCommodity from "../components/BuyCommodity/BuyCommodity";
import MyAccount from "../components/MyAccount/MyAccount";



export default class Home extends Component {
    constructor(props) {
        super(props);

        this.state = {
            isLoading: true,
            notes: []
        };
    }


    render() {
        return (
          <div>
          <SearchAndButtons/>
          /*<ListOfCommodities/>
          <SearchResults/>
          <BuyCommodity/>
          <SellCommodity/>
          <MyAccount/>
          </div>*/
        );
    }
}
