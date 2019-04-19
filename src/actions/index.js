import types from './types';

export function signIn(user){
    console.log('sign in action creator, user data', user)
    return {
        type: types.SIGN_IN,
        email: user.email //can be as long as you want, flexible
    }
}

export function signOut(user){
    return {
        type: types.SIGN_OUT
    }
}
