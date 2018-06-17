import React, { Component } from "react";
import { PageHeader, ListGroup } from "react-bootstrap";
import "../../Static/css/bootstrap.min.css";
import "../../Static/css/bootstrap-grid.min.css";
import "../../Static/css/custom.css";


export default class SearchAndButtons extends Component {
    constructor(props) {
        super(props);

        this.state = {
            isLoading: true,
            notes: []
        };
    }

    render() {
        return (
          <div id="big" class="container" align="center">
  <p class="text-center" id="header">Buy and Sell Stocks and CryptoCoins</p>
  <h1 id="home" class="text-center">PINK EXCHANGE</h1>
  <spacer></spacer>

      <div class=".float-center">
        <div class="col-lg-6 col-lg-offset-3">
        <form method="POST">
          <div class="input-group">
          <input type="text" class="form-control" placeholder="Insert the commodity you are looking for..."/>
          <span class="input-group-btn">
            <input class="btn btn-default" type="button" value="Search" onclick="return C_input()"/>
          </span>
          </div>
          </form>
        </div>
      </div>

<div class="container" align="center">
        <div class="row">
          <div class="col-sm">

          </div>
          <div class="col-sm">
            <span class="input-group-btn">
              <input class="btn btn-default" type="button" value="My Account" onclick="return myAcount()"/>
            </span>
          </div>

          <div class="col-sm">
            <span class="input-group-btn">
                <input class="btn btn-default" type="button" value="View Commodities" onclick="return buying() "/>
            </span>
          </div>

          <div class="col-sm">
            <span class="input-group-btn">
                <input class="btn btn-default" type="button" value="Buy Commodity" onclick="return selling()"/>
            </span>
          </div>
          <div class="col-sm">
            <span class="input-group-btn">
              <input class="btn btn-default" type="button" value="Sell Commodity" onclick="return allCommodity()"/>
            </span>
          </div>
          <div class="col-sm">

          </div>
          <div class="col-sm">

          </div>
        </div>
      </div>
  </div>
        );
    }
}
