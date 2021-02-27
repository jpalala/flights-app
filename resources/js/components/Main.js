import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import Flight from './Flight';

const totalNumberOfUsers = 25;
// for now we'll get the userId randomly until we implement authentication
const userId = Math.floor(Math.random() * Math.floor(totalNumberOfUsers));

class Main extends Component {

  constructor() {

    super();

    // currentFlight keeps track of the product currently displayed
    this.state = {
      flights: []
    }
  }

  componentDidMount() {
    fetch(`/api/flights`)
      .then(response => {
        return response.json();
      })
      .then(flights => {
        this.setState({flights});
      });
  }

  handleClick(flight) {
    this.setState({currentFlight: flight});
  }

  renderFlights() {
    return this.state.flights.map(flight => {
      return (
        <li onClick={() => this.handleClick(flight)}
            key={flight.id}
            className={(flight.cancelled) ? "flight greyed" : "flight"}>
          {flight.code}
        </li>
      );
    })
  }

  render() {
    return (
      <div id="app" className="container p-5">
        <div className="row">
          <div className="col-4">
            <h3> Flight </h3>
            <ul>
              {this.renderFlights()}
            </ul>
          </div>

          <div className="col-8">
            <Flight flight={this.state.currentFlight ?? ''}/>
          </div>
        </div>
      </div>
    );
  }
}

export default Main;

if (document.getElementById('root')) {
  ReactDOM.render(<Main/>, document.getElementById('root'));
}