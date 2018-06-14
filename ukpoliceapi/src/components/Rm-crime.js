import React,{Component} from 'react';

import axios from 'axios';

import {FormGroup,Label,Input,Button,Table} from 'reactstrap';

import RmSpinner from './Rm-spinner';

class RmCrime extends Component{

    constructor(){
        super();

        this.state = {
            crime : [],
            force : [],
            arrayCrime : [],
            inputCrime : '',
            inputForce : '',
            spinner : true,
            date : ''
        }

        this.handleChangeSearchCrimeAndForce = this.handleChangeSearchCrimeAndForce.bind(this);
        this.handleSearchCrime = this.handleSearchCrime.bind(this);
    }
     /* APIS CALLS*/ 
    searchCrimeAndForce(){
        axios.all([
            axios.get('https://data.police.uk/api/forces'),
            axios.get('https://data.police.uk/api/crime-categories'),
            axios.get('https://data.police.uk/api/crime-last-updated')
            ])
            .then(axios.spread((forcesResponse,crimeResponse,dateResponse) => {
                this.setState({
                    crime : crimeResponse.data,
                    force : forcesResponse.data,
                    date : dateResponse.data.date,
                    spinner : false
                    });
            }))
            .catch((e) => {
                console.log('fallo');
            })
        }

    searchCrime(){ 
        this.setState({spinner : true})
      axios.get(`https://data.police.uk/api/crimes-no-location?category=${this.state.inputCrime}&force=${this.state.inputForce}`)
          .then((response)=> {              
              this.setState({                  
                  arrayCrime : response.data,
                  spinner : false
              });
          })
          .catch((e)=> {
              console.log('asdasd');
          });
    }

    /* HANDLER*/
    handleChangeSearchCrimeAndForce(e){
        if(e.target.id === 'crimeSelect'){
            this.setState({
                inputCrime : String(e.target.value)
            });

        }else
            if(e.target.id === 'forceSelect'){
                this.setState({
                    inputForce : String(e.target.value)
                });
            }
    }

    handleSearchCrime(e){
        if(e.target.id === 'btnSearch'){
            this.searchCrime();
        }
    }

    /* STATE OF LIFE */
    componentDidMount(){        
        this.searchCrimeAndForce();

    }

    render(){
        return(
            <div className='principal'>
                
                {this.state.spinner ? <RmSpinner/> : 
                    <div>
                        <FormGroup>
                            <Label for="crimeSelect" className='letterStyle'>CRIME</Label>
                            <Input type="select" name="crimeSelect" id="crimeSelect" onChange={this.handleChangeSearchCrimeAndForce}>
                                {this.state.crime.map((e,key)=>
                                    <option value={e.url} key={key}>{e.name}</option>
                                )}
                            </Input>
                        
                            <Label for="forceSelect" className='letterStyle'>FORCE</Label>
                            <Input type="select" name="forceSelect" id="forceSelect" onChange={this.handleChangeSearchCrimeAndForce}>
                                {this.state.force.map((e,key)=>
                                    <option value={e.id} key={key}>{e.name}</option>
                                )}
                            </Input>
                        </FormGroup>
                        
                        <Button color="info" id='btnSearch' onClick={this.handleSearchCrime} >Search Crime</Button>
                        <br/>
                        <br/>
                        <Table striped className='letterStyle'>
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Location</th>
                                    <th>Month</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                {this.state.arrayCrime.map((element,key) =>
                                    <tr key={key}>
                                        <td>{element.category}</td>
                                        <td>{element.location}</td>
                                        <td>{element.month}</td>
                                        <td>{element.outcome_status.category}</td>
                                    </tr>
                                )}
                            </tbody>
                        </Table>
                        <Label className='labelCrime'><b>The last updated was in {this.state.date}</b></Label>
                    </div>

                    
                }  
            </div>
        );
    }
}
export default RmCrime;