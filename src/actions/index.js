export function signIn(user){
    console.log('sign in action creator, user data', user)
    return {
        type: 'SIGN_IN',
    }
}
