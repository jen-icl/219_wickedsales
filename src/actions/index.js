import types from './types';
import axios from 'axios';

export function getAllProducts(){
    return function(dispatch){
        axios.get('/api/getproducts.php').then((resp) => {
            dispatch({
                type: types.GET_ALL_PRODUCTS,
                products: resp.data.products
            });
        });
    }
}

export function signIn(user){
    return function(dispatch){
        axios.get('/api/sign-in.php').then(resp => {
            console.log('sign in resp', resp);
            if(resp.data.success){
                dispatch({
                    type: types.SIGN_IN
                });
            } else {
                dispatch({
                    type: types.SIGN_IN_ERROR
                });
            }
        });
    }
}

export function signOut(user){
    return {
        type: types.SIGN_OUT
    }
}
