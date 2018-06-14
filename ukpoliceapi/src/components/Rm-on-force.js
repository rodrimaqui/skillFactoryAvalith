import React,{ Component } from 'react';
import axios from 'axios';

import {Card,CardTitle,CardBody,CardSubtitle,CardText,CardLink,CardImg} from 'reactstrap';

import RmSpinner from './Rm-spinner.js';

class RmOnForce extends Component{

    constructor(props){
        super(props);

        this.state = {
            id : this.props.match.params.id,
            force : {},
            spinner : true
        }
    }

    componentDidMount(){

        axios.get('https://data.police.uk/api/forces/'+this.state.id)
        .then((response)=>{            
            this.setState({
                force : response.data,
                spinner : false
            });
        })
        .catch((e)=>{
            console.log(e);
        })
    }
    render(){

        return(
            <div className='principal'>
                { this.state.spinner ? <RmSpinner/> :
                    <div>
                        <Card body inverse style={{ backgroundColor: '#333', borderColor: '#333' }}>
                                <CardBody>
                                    <CardTitle>{this.state.force.name}</CardTitle>
                                    <CardSubtitle>Telephone: {this.state.force.telephone}</CardSubtitle>
                                </CardBody>                
                                <CardBody>
                                <CardImg bottom width="100%" src="https://e3.365dm.com/18/04/1096x616/skynews-uk-police-police_4277247.jpg?bypass-service-worker&20180408130351" alt="Card image cap" />
                                    <CardText>{this.state.force.description}</CardText>
                                    <CardLink href={this.state.force.url}>Police Page</CardLink>
                                </CardBody>
                        </Card>
                    </div>
                }
            </div>

        );
    }
}
export default RmOnForce;