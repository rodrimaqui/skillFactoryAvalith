import React,{Component} from 'react';

import axios from 'axios';

import RmSpinner from './Rm-spinner';

import {Button,FormGroup,Label,Table,Input} from 'reactstrap';

class RmStopAndSearch extends Component{

    constructor(){
        super();

        this.state = {

            spinner : true,
            arrayForces : [],
            arrayStops : [],
            force : ''
        }

        this.handleChangeSearchForce = this.handleChangeSearchForce.bind(this);
        this.handleSearchCrime = this.handleSearchCrime.bind(this);
    }
    
    /* API CALLS */
    searchForces(){
        axios.get('http://127.0.0.1:8000/forces')
        .then((response)=>{
            this.setState({
                arrayForces : response.data,
                spinner : false
            });
        })
        .catch((e)=>{
            console.log(e);
        });
    }

    searchStop(){
        axios.get(`http://127.0.0.1:8000/stop/${this.state.force}`)
        .then((response)=>{
            this.setState({
                arrayStops : response.data
            });
        })
        .catch((e)=>{
            console.log(e);
        })
    }

    /* Methods */
    handleChangeSearchForce(e){
        if(e.target.id === 'forceSelect'){
            this.setState({
                force : e.target.value
            });
        }
    }

    handleSearchCrime(e){
        if(e.target.id === 'btnSearch'){
           this.searchStop();
        }
    }
    
    componentDidMount(){
        this.searchForces();

    }
    render(){
        return(
            <div className='principal'>
                {this.state.spinner ? <RmSpinner/> : 
                    <div>
                         <FormGroup>
                            <Label for="forceSelect" className='letterStyle'>Force</Label>
                            <Input type="select" name="forceSelect" id="forceSelect" onChange={this.handleChangeSearchForce}>
                                <option value='' selected disabled hidden>Choose one</option>
                                {this.state.arrayForces.map((e,key)=>
                                    <option value={e.force_id} key={key}>{e.name}</option>
                                )}
                            </Input>
                        </FormGroup>

                        <Button color="info" id='btnSearch' onClick={this.handleSearchCrime} >Search Stop</Button>
                        <br/>
                        <br/>
                        <Table striped className='letterStyle'>
                            <thead>
                                <tr>
                                    <th>Age Range</th>
                                    <th>Ethnicity</th>
                                    <th>Gender</th>
                                    <th>Legsilation</th>
                                    <th>DateTime</th>
                                    <th>Type of Search</th>
                                    <th>Object of Search</th>
                                </tr>
                            </thead>
                            <tbody>
                                {this.state.arrayStops.map((element,key) =>
                                    <tr key={key}>
                                        <td>{element.age}</td>
                                        <td>{element.ethnicity}</td>
                                        <td>{element.gender}</td>
                                        <td>{element.legislation}</td>
                                        <td>{element.datetime}</td>
                                        <td>{element.type }</td>
                                        <td>{element.search}</td>
                                    </tr>
                                )}
                            </tbody>
                        </Table>
                    </div>
                }

            </div>
        );
    }
}

export default RmStopAndSearch;