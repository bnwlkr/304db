import React, { Component } from "react";
import { PageHeader, ListGroup } from "react-bootstrap";
import "../../Static/css/bootstrap.min.css";
import "../../Static/css/bootstrap-grid.min.css";
import "../../Static/css/custom.css";


export default class SearchResults extends Component {
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
              <div class="row">
                <div class="col-lg-6" align="left">
                  <div class="col-lg-12">
                    <div class="panel panel-default">
                      <div class="panel-heading"><h5>Name Of Commodity</h5>
                      </div>
                      <div class="panel-body">
                        <ul>
                          <li>Max Price:</li>
                          <li>Min Price</li>
                        </ul>
                    </div>
                  </div>
                </div>

              </div>
</div>
            </div>
        );
      }
    }
