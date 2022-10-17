import React, { ReactNode, useContext, createContext, useState } from 'react'
import { ICurrentUser } from '../../types'

type Props = {
    children: ReactNode
}

export const userContext = createContext<any>(null)

export const UserContextProvider = ({children} : Props) => {

    const userState = useState(null);

    return (
        <userContext.Provider value={userState}>
            {children}
        </userContext.Provider>
    )
}
