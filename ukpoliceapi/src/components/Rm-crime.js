import React,{Component} from 'react';

import axios from 'axios';

import {FormGroup,Label,Input,Button} from 'reactstrap';

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
            spinner : true
        }

        this.handleChangeSearchCrimeAndForce = this.handleChangeSearchCrimeAndForce.bind(this);
        this.handleSearchCrime = this.handleSearchCrime.bind(this);
    }
     /* APIS CALLS*/ 
    searchCrimeAndForce(){
        axios.all([
            axios.get('https://data.police.uk/api/forces'),
            axios.get('https://data.police.uk/api/crime-categories')
            ])
            .then(axios.spread((forcesResponse,crimeResponse) => {
                this.setState({
                    crime : crimeResponse.data,
                    force : forcesResponse.data,
                    inputCrime : '',
                    inputForce : '',
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
              console.log(e);
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
            <div>
                {this.state.spinner ? <RmSpinner/> : 
                    <div>
                        <FormGroup>
                            <Label for="crimeSelect">CRIME</Label>
                            <Input type="select" name="crimeSelect" id="crimeSelect" onChange={this.handleChangeSearchCrimeAndForce}>
                                {this.state.crime.map((e,key)=>
                                    <option value={e.url} key={key}>{e.name}</option>
                                )}
                            </Input>
                        
                            <Label for="forceSelect">FORCE</Label>
                            <Input type="select" name="forceSelect" id="forceSelect" onChange={this.handleChangeSearchCrimeAndForce}>
                                {this.state.force.map((e,key)=>
                                    <option value={e.id} key={key}>{e.name}</option>
                                )}
                            </Input>
                        </FormGroup>
                        
                            <Button color="info" id='btnSearch' onClick={this.handleSearchCrime} >Search Crime</Button>
                    </div>
                }  
            </div>
        );
    }
}
export default RmCrime;