import React, { Component } from "react";
import { PageHeader, ListGroup } from "react-bootstrap";
import "../../Static/css/bootstrap.min.css";
import "../../Static/css/bootstrap-grid.min.css";
import "../../Static/css/custom.css";


export default class ListOfCommodities extends Component {
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
                     <div class="panel-heading"><h5>Commodities</h5>
                       <table class="table">
                           <thead class="thead-light">
                             <tr>
                               <th scope="col">Name of Commodity</th>
                               <th scope="col">Maxmim Price (CA$)</th>
                               <th scope="col">Minimum Price (CA$)</th>
                             </tr>
                           </thead>
                           <tbody>
                             <tr>
                               <th scope="row">1</th>
                               <td>Coin</td>
                               <td>20</td>
                               <td>24</td>
                             </tr>
                             <tr>
                               <th scope="row">2</th>
                               <td>Stock</td>
                               <td>10</td>
                               <td>15</td>
                             </tr>

                           </tbody>
                         </table>
                     </div>

                 </div>
               </div>
 </div>
</div>
          </div>
        );
      }
    }
