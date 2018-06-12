import React, { Component } from 'react';
import './App.css';

import {Container,Row,Col} from 'reactstrap';

import RmHeader from './components/Rm-header.js';

import {BrowserRouter} from 'react-router-dom';

import AppRouter from './router';


class App extends Component {
  render() {
    return (
      <div className="App">
        <RmHeader/>
        <Container>
          <Row>
            <Col lg="3" md="3"></Col>
            <Col lg="6" md="6">
              <BrowserRouter>
                <AppRouter/>
              </BrowserRouter>
            </Col>
            <Col lg='3' md='3'></Col>
          </Row>
        </Container>


      </div>
    );
  }
}

export default App;
