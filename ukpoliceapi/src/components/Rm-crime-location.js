import React,{Component} from 'react';
import axios from 'axios';


class RmCrimeLocation extends Component{

    constructor(){
        super();

        this.state = {
            date : '',
            locations : [],
            locationBool : false,
            forces : [],
            force : ''
            
        }

        this.handlerSetDate = this.handlerSetDate.bind(this);
    }

    /* API CALLS */
    getForce(){
            axios.get('https://data.police.uk/api/forces')
                .then((response) => {
                    this.setState({
                        forces : response.data,
                        locationBool : true
                    });
                })
                .catch((e)=>{
                    console.log(e);
                });
    }

    /* Handler */
    handlerSetDate(e){

        if(e.target.id === 'dateInput'){
            const dateO = new Date(e.target.value);                   
            const dateAux = dateasd.getFullYear()+'-'+ dateasd.getMonth();
            
            this.setState({
                date : dateAux
            });
        }
    }

    handleChangeForceAndLocation(e){
        if(e.target.vid === 'forceSelect'){
            this.setState({
                force : String(e.target.value)
            });
        }
    }

    /*  */
    componentDidMount(){
        this.getForce();
    }
    render(){
        return(
            <div>

                <FormGroup>
                    {   
                        <div>
                            <Label for="forceSelect" className='letterStyle'>FORCE</Label>
                            <Input type="select" name="forceSelect" id="forceSelect" onChange={this.handleChangeForceAndLocation}>
                                    <option selected>...</option>
                                    {
                                        this.state.forces.map((e,key)=>
                                            <option value={e.id} key={key}>{e.name}</option>
                                        )
                                    }
                            </Input>
                            <Label for='LocationSelect' className='letterStyle'>Location</Label>
                            <Input type='select' name='locationSelect' id='locationSelect' onChange={this.handleChangeForceAndLocation}>
                                {
                                    this.state.locations.map((e,key) => 
                                        <option value={e.id} key={key}> {e.name}</option>
                                    )
                                }
                            </Input>

                            <Input type='month' name='dateInput' id='dateInput' onChange={this.handlerSetDate}/>
                        </div>
                    }
                </FormGroup>
            </div>
        );
    }
}
export default RmCrimeLocation;