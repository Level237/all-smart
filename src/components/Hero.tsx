import React from 'react'

export default function Hero() {
  return (
    <section style={{ backgroundImage: "url('/tof.jpg')" }} className='relative bg-cover bg-center h-screen flex flex-col justify-center items-center'>
     <div className='absolute bg-[#0B0B0B] pointer-events-none opacity-85 h-full w-full'>

     </div>
     <div className='z-50'>
        <h2 style={{ fontFamily:"Ubuntu" }} className='text-8xl font-sans  text-white'>All SMART</h2>
     </div>
     <div className='z-50'>
        <h2  className='text-2xl text-center font-primary max-w-96 text-white'>Votre agence conseil en stratégie, communication et marketing</h2>
     </div>
    </section>
  )
}
