import React from 'react'

export const Signup = () => {
    return (
        <>
            <div>Signup</div>
            <form action="">
                <input type="text" name="name" placeholder='Username' /> <br />
                <input type="password" name="name" placeholder='Password' /> <br />
                <br />
                <input type="text" name="name" placeholder='First Name' /> <br />
                <input type="text" name="name" placeholder='Last Name' /> <br />
                <input type="text" name="name" placeholder='Height' /> <br />
                <input type="text" name="name" placeholder='Birthday' /> <br />
                <select name="" id="">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select><br />
                <input type="date" id="start" name="trip-start"
                    value="0000-00-00"
                    min="2004-01-01" max="3000-12-31">
                </input>
                <input type="subtmit" value="Sign Up" />
            </form>
        </>
    )
}
