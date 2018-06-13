import React, { Component } from 'react';
import './App.css';

import {Container,Row,Col} from 'reactstrap';

import RmHeader from './components/Rm-header.js';

import {BrowserRouter} from 'react-router-dom';

import AppRouter from './router';
import RmPoliceLight from './components/Rm-police-light';


class App extends Component {
  render() {
    return (
      <div className="App">
        <RmHeader/>
        <Container>
          <Row>
            <Col lg="1" md="1"></Col>
            <Col lg="10" md="10">
              <BrowserRouter>
                <AppRouter/>
              </BrowserRouter>
            </Col>
            <Col lg='1' md='1'></Col>
          </Row>
          <Row>
            <Col lg='12'>
                <RmPoliceLight/>
            </Col>
          </Row>
        </Container>


      </div>
    );
  }
}

export default App;
