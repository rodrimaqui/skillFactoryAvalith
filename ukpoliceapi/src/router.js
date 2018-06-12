import React from 'react'
import {Route, Switch} from 'react-router-dom';

import RmForces from './components/Rm-forces.js';
import RmOnForce from './components/Rm-on-force.js';
import RmCrime from './components/Rm-crime.js';


const AppRoutes = () =>
    <div>
        <Switch>
            <Route path="/crime" component={RmCrime}/>
            <Route path="/forces/" component={RmForces}/>
            <Route path="/:id" component={RmOnForce}/>
           
        </Switch>
    </div>
export default AppRoutes;