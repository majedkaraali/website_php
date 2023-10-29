greyfurt =60
mandalina =60
lemon =60
portakal =60



print("grey furt 1 mandalina 2 lemon 3 portakal 4")


siparis=int(input("siparis icin rakam taklayiniz"))
miktar=int(input(" lutfen miktar giriniz"))



if siparis==1:
    if miktar<greyfurt:
        greyfurt=greyfurt-miktar
    else:
        print("-------------------*********************************************")
        print("Yeterli stok yok")
elif siparis==2:
    if miktar<mandalina:
        mandalina=mandalina-miktar
    else:
        print("-------------------*********************************************")
        print("Yeterli stok yok")

elif siparis==3:
    if miktar<lemon:
        lemon=lemon-miktar
    else:
        print("-------------------*********************************************")
        print("Yeterli stok yok")
elif siparis==4:
    if miktar<portakal:
        portakal=portakal-miktar
    else:
        print("-------------------*********************************************")
        print("Yeterli stok yok")


print("kalan greyfurt=",greyfurt)
print("kalan mandalina=",mandalina)
print("kalan lemon=",lemon)
print("kalan portakal=",portakal)