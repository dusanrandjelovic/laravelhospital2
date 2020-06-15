import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Api from './Api.js';

export default class Example extends Component {
    render() {
        return (
            <div className="container">
                  <Api naslov="Vremenska prognoza" />
            </div>
        );
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
