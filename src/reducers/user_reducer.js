import types from '../actions/types';

const DEFAULT_STATE = {
    auth: false,
    email: ''
};

function userReducer(state = DEFAULT_STATE, action) { //state and actions are objects, state is the current state, action contains information to update state
    switch (action.type) {
        case types.SIGN_IN:
            return {...state, auth: true, email: action.email};
        case types.SIGN_OUT:
            return {...DEFAULT_STATE};
        default:
            return state;
    }
}

export default userReducer;
