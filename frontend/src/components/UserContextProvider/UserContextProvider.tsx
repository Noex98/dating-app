import React, { ReactNode, useContext, createContext, useState } from 'react'
import { ICurrentUser } from '../../types'

type Props = {
    children: ReactNode
}

type IUserContext = {
    data: ICurrentUser | null,
    set: null | React.Dispatch<React.SetStateAction<ICurrentUser | null>>
}

export const userContext = createContext<null | IUserContext>(null);

export const UserContextProvider = ({children} : Props) => {

    const userState = useState<ICurrentUser| null>(null);

    return (
        <userContext.Provider value={{data: userState[0], set: userState[1]}}>
            {children}
        </userContext.Provider>
    )
}
