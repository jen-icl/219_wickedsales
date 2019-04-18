const DEFAULT_STATE = {
    auth: false,
    username: ''
};

function userReducer(state = DEFAULT_STATE, action) { //state and actions are objects, state is the current state, action contains information to update state
    switch (action.type) {
        case 'SIGN_IN':
            return {...state, auth: true};
        default:
            return state;
    }
}

export default userReducer;
