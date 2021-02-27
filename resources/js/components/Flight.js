import React, {Component} from 'react';

const Flight = ({flight}) => {
  if (!flight) {
    return (
      <div className="single-flight-wrapper">
        <h4>No flight selected.</h4>
      </div>
    )
  }
  return (
    <div className="single-flight-wrapper">
      <h3> {flight.code} </h3>
      <p> {flight.origin} </p>
      <p> {flight.destination} </p>
      <p> {flight.departure_time} </p>
      <h4> Status: </h4>
      <p>{flight.cancelled ? 'Cancelled' : 'On Schedule'}</p>
    </div>
  )
};

export default Flight;