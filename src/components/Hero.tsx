import React from 'react'
import Header from './Header'

export default function Hero() {
  return (

    <section style={{ backgroundImage: "url('/tof.jpg')" }} className='bg-cover z-20 relative   bg-center'>
         <div className='absolute bg-[#0B0B0B] pointer-events-none opacity-85 h-full w-full'>

        </div>
        <div className='w-full'>
    <Header/>
    </div>
  <section  className=' flex h-screen flex-col justify-center items-center'>

     <div className='z-50'>
        <h2 style={{ fontFamily:"" }} className='text-8xl font-sans  text-white'>All SMART</h2>
     </div>
     <div className='z-50'>
        <h2  className='text-3xl font-bold text-center font-primary max-w-[30rem] text-white'>Votre agence conseil en stratégie, communication et marketing</h2>
     </div>
    </section>
   
    </section>
  
  )
}
