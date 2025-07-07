import React from 'react';
import { Navigate } from 'react-router-dom';
import Cookies from 'js-cookie';

export const PrivateRoute = ({ children }) => {
    
  const authData = Cookies.get('auth');

  console.log("authData in PrivateRoute:", authData); 

  return authData ? children : <Navigate to="/" replace />;
};

