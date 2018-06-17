import React, { Component } from "react";
import { PageHeader, ListGroup } from "react-bootstrap";
import "../../Static/css/bootstrap.min.css";
import "../../Static/css/bootstrap-grid.min.css";
import "../../Static/css/custom.css";


export default class SellCommodity extends Component {
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
                   <div class="panel-heading"><h5>Sell commodity</h5>
                     <form>
                             <div class="form-group row">
                             <label for="example-text-input" class="col-2 col-form-label">Commodity</label>
                             <div class="col-10">
                             <input class="form-control" type="text" value="Commodity" id="example-text-input"/>
                             </div>
                             </div>
                             <div class="form-group row">
                             <label for="example-search-input" class="col-2 col-form-label">Exchange</label>
                             <div class="col-10">
                             <input class="form-control" type="search" value="Exchange" id="example-search-input"/>
                             </div>
                             </div>
                             <div class="form-group row">
                             <label for="example-date-input" class="col-2 col-form-label">Date</label>
                             <div class="col-10">
                             <input class="form-control" type="date" value="2011-08-19" id="example-date-input"/>
                             </div>
                             </div>
                             <div class="form-group row">
                             <label for="example-time-input" class="col-2 col-form-label">Time</label>
                             <div class="col-10">
                             <input class="form-control" type="time" value="13:45:00" id="example-time-input"/>
                             </div>
                             </div>
                             <button type="submit" class="btn btn-defoult" align="right">Sell</button>
                             </form>

               </div>
             </div>
         </div>
    </div>
  </div>
    </div>
        );
      }
    }
